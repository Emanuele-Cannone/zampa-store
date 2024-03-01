<?php

namespace App\Services;

use App\Models\Cluster;
use App\Models\User;
//use Spatie\Permission\Models\Permission;
//use Spatie\Permission\Models\Role;

class ButtonsService
{
    /**
     * Get show button.
     *
     * @param bool $dataTable
     * @param Cluster $item
     * @return string
     */
    public static function showButton(bool $dataTable, Cluster $item): string
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
     * Get route for item.
     *
     * @param Cluster $item
     * @return string|null
     */
    public static function getRouteType(Cluster $item): ?string
    {
        return match ($item->getTable()) {
            'clusters' => 'clusters',
//            'external_apps' => 'external-apps',
//            'feedback' => 'feedback',
//            'feedback_requests' => 'feedback-requests',
//            'permissions' => 'permission',
//            'roles' => 'role',
//            'tags' => 'tags',
//            'touch_points' => 'touch-points',
//            'typologies' => 'typologies',
//            'users' => 'users',
            default => null
        };
    }

    /**
     * Get edit button.
     *
     * @param bool $dataTable
     * @param Cluster $item
     * @return string
     */
    public static function editButton(bool $dataTable, Cluster $item): string
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
     * @param Cluster $item
     * @param string|null $type
     * @return string
     */
    public static function deleteButton(bool $dataTable, Cluster $item, string $type = null): string
    {
        $route = self::getRouteType($item);
        $output = '';
        if (!is_null($route)) {
            $output .= match ($route) {
                'feedback', 'feedback-requests', 'touch-points' => '<form class="confirm-delete" action="' . route($route . '.destroy', [$type, $item->id]) . '" method="post" style="display:inline;">',
                default => '<form class="confirm-delete" action="' . route($route . '.destroy', [$item->id]) . '" method="post" style="display:inline;">',
            };
            $output .= '<input type="hidden" name="_method" value="delete">';
            $output .= '<input type="hidden" name="_token" value="' . csrf_token() . '">';
            $output .= '<button class="btn btn-dark ' . ($dataTable ? 'btn-sm' : null) . '" type="submit"><i class="fas fa-times"></i> ' . trans('common.delete') . '</button>';
            $output .= '</form> ';
        }
        return $output;
    }

    /**
     * Get sent button.
     *
     * @param bool $dataTable
     * @return string
     */
    public static function sentButton(bool $dataTable): string
    {
        return '<button class="btn btn-outline-success ' . ($dataTable ? 'btn-sm' : null) . '" disabled="disabled" title="' . trans('common.button_delete_title') . '"><i class="fas fa-check"></i> ' . trans('common.already_sent') . '</button> ';
    }

    /**
     * Get read button.
     *
     * @param bool $dataTable
     * @return string
     */
    public static function readButton(bool $dataTable): string
    {
        return '<button class="btn btn-outline-success ' . ($dataTable ? 'btn-sm' : null) . '" disabled="disabled" title="' . trans('common.button_edit_title') . '"><i class="fas fa-check-double"></i> ' . trans('common.already_read') . '</button> ';
    }

    /**
     * Get thank received button.
     *
     * @param bool $dataTable
     * @return string
     */
    public static function thankReceivedButton(bool $dataTable): string
    {
        return '<button class="btn btn-outline-secondary ' . ($dataTable ? 'btn-sm' : null) . '" disabled="disabled" title="' . trans('common.button_thanked_received_title') . '"><i class="fas fa-thumbs-up"></i> ' . trans('common.thank_you_received') . '</button> ';
    }

    /**
     * Get thank sent button.
     *
     * @param bool $dataTable
     * @return string
     */
    public static function thankSentButton(bool $dataTable): string
    {
        return '<button class="btn btn-outline-secondary ' . ($dataTable ? 'btn-sm' : null) . '" disabled="disabled" title="' . trans('common.button_thanked_sent_title') . '"><i class="fas fa-thumbs-up"></i> ' . trans('common.thank_you_sent') . '</button> ';
    }

    /**
     * Get touch point made button.
     *
     * @param bool $dataTable
     * @return string
     */
    public static function touchPointMadeButton(bool $dataTable): string
    {
        return '<button class="btn btn-outline-primary ' . ($dataTable ? 'btn-sm' : null) . '" type="submit" disabled="disabled" title="' . trans('common.button_made_title') . '"><i class="fas fa-check"></i> ' . trans('common.touch_point_already_made') . '</button> ';
    }
}
