<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Builder;
use \App\Exceptions\GroupDoesNotExist;
use \App\Models\Group;
use Illuminate\Support\Facades\DB;

trait HasGroup
{
    /**
     * A model may have multiple direct permissions.
     */
    public function group(): BelongsToMany
    {
        return $this->morphToMany(
            Group::class,
            'groupable',
            'model_has_group',
            'groupable_id',
            'group_id'
        );
    }

    /**
     * Get group by name.
     *
     * @param strign $name
     *
     * @throws \App\Exceptions\GroupDoesNotExist
     *
     * @return \App\Models\Group
     */
    private function getGroupByName($name)
    {
        $group = Group::where('name', $name)->first();
        if (!$group) {
            throw GroupDoesNotExist::create($name);
        }

        return $group;
    }

    /**
     * Sync model group. Create if not assigned yet.
     *
     * @param \App\Models\Group $group;
     *
     * @return void
     */
    private function syncGroup($group)
    {
        if (!$this->group->isEmpty()) {
            $this->group()->sync($group);
        } else {
            $this->group()->save($group);
        }
    }

    /**
     * Assign model to group.
     *
     * @param strign $name
     *
     * @return void
     */
    public function assingGroup($name)
    {
        // check if group exist
        $group = $this->getGroupByName($name);

        $this->syncGroup($group);
    }
}
