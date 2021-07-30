<?php

namespace App\Observers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;

class CategoryObserver
{
	public function creating(Category $category) {
		if (empty($category->slug)) {
			$category->slug = Str::slug($category->name, '_');
		}
	}

	/**
	 * Handle the Category "created" event.
	 *
	 * @param  \App\Models\Category  $category
	 * @return void
	 */
	public function created(Category $category)
	{
		//
	}

	/**
	 * Handle the Category "updated" event.
	 *
	 * @param  \App\Models\Category  $category
	 * @return void
	 */
	public function updated(Category $category)
	{
			//
	}

	/**
	 * Handle the Category "deleted" event.
	 *
	 * @param  \App\Models\Category  $category
	 * @return void
	 */
	public function deleted(Category $category)
	{
			//
	}

	/**
	 * Handle the Category "restored" event.
	 *
	 * @param  \App\Models\Category  $category
	 * @return void
	 */
	public function restored(Category $category)
	{
			//
	}

	/**
	 * Handle the Category "force deleted" event.
	 *
	 * @param  \App\Models\Category  $category
	 * @return void
	 */
	public function forceDeleted(Category $category)
	{
			//
	}
}
