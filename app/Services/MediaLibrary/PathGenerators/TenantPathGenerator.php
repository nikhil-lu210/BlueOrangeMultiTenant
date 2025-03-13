<?php

namespace App\Services\MediaLibrary\PathGenerators;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Stancl\Tenancy\Tenancy;

class TenantPathGenerator implements PathGenerator
{
    // public function getPath(Media $media): string
    // {
    //     // Get the current tenant ID if tenancy is initialized
    //     $tenantId = tenancy()->initialized ? tenant()->id : 'central';

    //     return "tenants/{$tenantId}/users/{$media->model->userid}/{$media->collection_name}/";
    // }

    // public function getPathForConversions(Media $media): string
    // {
    //     $tenantId = tenancy()->initialized ? tenant()->id : 'central';

    //     return "tenants/{$tenantId}/users/{$media->model->userid}/{$media->collection_name}/conversions/";
    // }

    public function getPath(Media $media): string
    {
        $tenantId = tenancy()->initialized ? tenant()->id : 'central';

        return "tenant{$tenantId}/users/{$media->model->userid}/{$media->collection_name}/";
    }

    public function getPathForConversions(Media $media): string
    {
        $tenantId = tenancy()->initialized ? tenant()->id : 'central';

        return "tenant{$tenantId}/users/{$media->model->userid}/{$media->collection_name}/conversions/";
    }


    public function getPathForResponsiveImages(Media $media): string
    {
        $tenantId = tenancy()->initialized ? tenant()->id : 'central';

        return "tenants{$tenantId}/users/{$media->model->userid}/{$media->collection_name}/responsive/";
    }
}
