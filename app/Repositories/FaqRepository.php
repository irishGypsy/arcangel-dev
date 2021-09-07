<?php

namespace App\Repositories;

use App\Models\Faq;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\FaqContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class FaqRepository
 *
 * @package \App\Repositories
 */
class FaqRepository extends BaseRepository implements FaqContract
{
    use UploadAble;


    /**
     * FaqRepository constructor.
     * @param Faq $model
     */
    public function __construct(Faq $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function ListFaqs(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findFaqById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Faq|mixed
     */
    public function createFaq(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;
            $merge = $collection->merge(compact('image'));

            $faq = new Faq($merge->all());

            $faq->save();

            return $faq;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateFaq(array $params)
    {
        $faq = $this->findFaqById($params['id']);

        $collection = collect($params)->except('_token');
        $image = null;

        $merge = $collection->merge(compact( 'image'));

        $faq->update($merge->all());

        return $faq;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteFaq($id)
    {
        $faq = $this->findFaqById($id);

        if ($faq->logo != null) {
            $this->deleteOne($faq->image);
        }

        $faq->delete();

        return $faq;
    }

    public function findBySlug($slug)
    {
        return Faq::with('faqs')
            ->where('slug', $slug)
//            ->where('menu', 1)
            ->first();
    }
}

