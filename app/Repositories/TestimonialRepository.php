<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Models\Testimonial;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\TestimonialContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class TestimonialRepository
 *
 * @package \App\Repositories
 */
class TestimonialRepository extends BaseRepository implements TestimonialContract
{
    use UploadAble;


    /**
     * TestimonialRepository constructor.
     * @param Testimonial $model
     */
    public function __construct(Testimonial $model)
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
    public function ListTestimonials(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */

    public function findTestimonialById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }

    }

    /**
     * @param array $params
     * @return Testimonial|mixed
     */
    public function createTestimonial(array $params)
    {
        try {
            $collection = collect($params);

            $image = null;

            if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {
                $image = $this->uploadOne($params['image'], 'testimonials');
            }
//            ddd($params['image']);
            $merge = $collection->merge(compact('image'));
//            dd($merge);
            $testimonial = new Testimonial($merge->all());
//            dd($testimonial);
            $testimonial->save();

            return $testimonial;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateTestimonial(array $params)
    {
        $testimonial = $this->findTestimonialById($params['id']);

        $collection = collect($params)->except('_token');
        $image = null;
//ddd($params);
        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($testimonial->image != null) {
                $this->deleteOne($testimonial->image);
            }

            $image = $this->uploadOne($params['image'], 'testimonials');
        }

        $merge = $collection->merge(compact( 'image'));

        $testimonial->update($merge->all());

        return $testimonial;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteTestimonial($id)
    {
        $testimonial = $this->findTestimonialById($id);

        if ($testimonial->logo != null) {
            $this->deleteOne($testimonial->image);
        }

        $testimonial->delete();

        return $testimonial;
    }

    public function findBySlug($slug)
    {
        return Testimonial::with('testimonials')
            ->where('slug', $slug)
//            ->where('menu', 1)
            ->first();
    }
}

