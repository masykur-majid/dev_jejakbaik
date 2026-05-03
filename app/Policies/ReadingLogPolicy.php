<?php

declare(strict_types=1);

namespace App\Policies;

use Illuminate\Foundation\Auth\User as AuthUser;
use App\Models\ReadingLog;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReadingLogPolicy
{
    use HandlesAuthorization;
    
    public function viewAny(AuthUser $authUser): bool
    {
        return $authUser->can('ViewAny:ReadingLog');
    }

    public function view(AuthUser $authUser, ReadingLog $readingLog): bool
    {
        return $authUser->can('View:ReadingLog');
    }

    public function create(AuthUser $authUser): bool
    {
        return $authUser->can('Create:ReadingLog');
    }

    public function update(AuthUser $authUser, ReadingLog $readingLog): bool
    {
        return $authUser->can('Update:ReadingLog');
    }

    public function delete(AuthUser $authUser, ReadingLog $readingLog): bool
    {
        return $authUser->can('Delete:ReadingLog');
    }

    public function deleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('DeleteAny:ReadingLog');
    }

    public function restore(AuthUser $authUser, ReadingLog $readingLog): bool
    {
        return $authUser->can('Restore:ReadingLog');
    }

    public function forceDelete(AuthUser $authUser, ReadingLog $readingLog): bool
    {
        return $authUser->can('ForceDelete:ReadingLog');
    }

    public function forceDeleteAny(AuthUser $authUser): bool
    {
        return $authUser->can('ForceDeleteAny:ReadingLog');
    }

    public function restoreAny(AuthUser $authUser): bool
    {
        return $authUser->can('RestoreAny:ReadingLog');
    }

    public function replicate(AuthUser $authUser, ReadingLog $readingLog): bool
    {
        return $authUser->can('Replicate:ReadingLog');
    }

    public function reorder(AuthUser $authUser): bool
    {
        return $authUser->can('Reorder:ReadingLog');
    }

    public function manage(AuthUser $authUser): bool
    {
        return $authUser->can('Manage:ReadingLog');
    }

}