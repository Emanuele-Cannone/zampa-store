<?php

namespace App\Services;

use App\Models\Animal;
use App\Models\AnimalTypology;
use App\Models\Breed;
use App\Models\Cluster;
use App\Models\Customer;
use App\Models\Provider;
use App\Models\ProviderInvoice;
use App\Models\User;
//use Spatie\Permission\Models\Permission;
//use Spatie\Permission\Models\Role;

class ButtonsService
{
    /**
     * Get route for item.
     *
     * @param ProviderInvoice|AnimalTypology|Breed|Animal|Customer|Provider|Cluster $item
     * @return string|null
     */
    public static function getRouteType(ProviderInvoice|AnimalTypology|Breed|Animal|Customer|Provider|Cluster $item): ?string
    {
        return match ($item->getTable()) {
            'clusters' => 'clusters',
            'providers' => 'providers',
            'customers' => 'customers',
            'animals' => 'animals',
            'breeds' => 'breeds',
            'animal_typologies' => 'animal-typologies',
            'provider_invoices' => 'provider-invoices',
            default => null
        };
    }

    /**
     * Get show button.
     *
     * @param bool $dataTable
     * @param ProviderInvoice|AnimalTypology|Breed|Animal|Customer|Provider|Cluster $item
     * @return string
     */
    public static function showButton(bool $dataTable, ProviderInvoice|AnimalTypology|Breed|Animal|Customer|Provider|Cluster $item): string
    {
        $route = self::getRouteType($item);
        $output = '';
        if (!is_null($route)) {
            $output .= '<a class="btn btn-info ' . ($dataTable ? 'btn-sm' : null) . '" href="' . route($route . '.show', [$item->id]) . '">';
            $output .= '<i class="fas fa-eye"></i> ' . trans('common.show');
            $output .= '</a> ';
        }
        return $output;
    }

    /**
     * Get edit button.
     *
     * @param bool $dataTable
     * @param ProviderInvoice|AnimalTypology|Breed|Animal|Customer|Provider|Cluster $item
     * @return string
     */
    public static function editButton(bool $dataTable, ProviderInvoice|AnimalTypology|Breed|Animal|Customer|Provider|Cluster $item): string
    {
        $route = self::getRouteType($item);
        $output = '';
        if (!is_null($route)) {
            $output .= '<a class="btn btn-warning ' . ($dataTable ? 'btn-sm' : null) . '" href="' . route($route . '.edit', [$item->id]) . '">';
            $output .= '<i class="fas fa-edit"></i> ' . trans('common.edit');
            $output .= '</a> ';
        }
        return $output;
    }

    /**
     * Get delete button.
     *
     * @param bool $dataTable
     * @param ProviderInvoice|AnimalTypology|Breed|Animal|Customer|Provider|Cluster $item
     * @param string|null $type
     * @return string
     */
    public static function deleteButton(bool $dataTable, ProviderInvoice|AnimalTypology|Breed|Animal|Customer|Provider|Cluster $item, string $type = null): string
    {
        $route = self::getRouteType($item);
        $output = '';
        if (!is_null($route)) {
            $output .= match ($route) {
                'feedback-requests', 'touch-points' => '<form class="confirm-delete" action="' . route($route . '.destroy', [$type, $item->id]) . '" method="post" style="display:inline;">',
                default => '<form class="confirm-delete" action="' . route($route . '.destroy', [$item->id]) . '" method="post" style="display:inline;">',
            };
            $output .= '<input type="hidden" name="_method" value="delete">';
            $output .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
            $output .= '<button class="btn btn-dark ' . ($dataTable ? 'btn-sm' : null) . '" type="submit"><i class="fas fa-times"></i> ' . trans('common.delete') . '</button>';
            $output .= '</form> ';
        }
        return $output;
    }
}
