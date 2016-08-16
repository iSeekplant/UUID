<?php

namespace ISeekplant\Uuid;

/**
 * Class UuidRepositoryTrait
 * @package ISeekplant\Uuid
 */
trait UuidRepositoryTrait
{

    /**
     * @param $uuid
     * @return mixed
     */
    public function get($uuid)
    {
        $class = $this->repoClass;

        if (isset($this->getWith)) {
            return $class::with($this->getWith)->where($class::getUuidColumn(), $uuid)->firstOrFail();
        }

        return $class::where($class::$uuidColumn, $uuid)->firstOrFail();
    }

    /**
     * @param $uuid
     * @param $formData
     */
    public function update($uuid, $formData)
    {
        $model = $this->get($uuid);

        $model->fill($formData);

        $model->save();
    }
}