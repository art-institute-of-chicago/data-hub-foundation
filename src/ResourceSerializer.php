<?php

namespace Aic\Hub\Foundation;

use League\Fractal\Serializer\DataArraySerializer;

class ResourceSerializer extends DataArraySerializer
{
   /**
    * Serialize a collection.
    *
    * @param string $resourceKey
    *
    * @return array
    */
    public function collection(?string $resourceKey, array $data): array
    {
        return [$resourceKey ?: 'data' => $data];
    }

    /**
     * Serialize an item.
     *
     * @param string $resourceKey
     *
     * @return array
     */
    public function item(?string $resourceKey, array $data): array
    {
        return [$resourceKey ?: 'data' => $data];
    }
}
