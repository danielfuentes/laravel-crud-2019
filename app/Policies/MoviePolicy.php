<?php

namespace App\Policies;

use App\User;
use App\Movie;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoviePolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any movies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the movie.
     *
     * @param  \App\User  $user
     * @param  \App\Movie  $movie
     * @return mixed
     */
    public function view(User $user, Movie $movie)
    {
    }

    /**
     * Determine whether the user can create movies.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role === User::ROLE_ADMIN;
    }

    /**
     * Determine whether the user can update the movie.
     *
     * @param  \App\User  $user
     * @param  \App\Movie  $movie
     * @return mixed
     */
    public function update(User $user, Movie $movie)
    {
        //
    }

    /**
     * Determine whether the user can delete the movie.
     *
     * @param  \App\User  $user
     * @param  \App\Movie  $movie
     * @return mixed
     */
    public function delete(User $user, Movie $movie)
    {
        //
    }

    /**
     * Determine whether the user can restore the movie.
     *
     * @param  \App\User  $user
     * @param  \App\Movie  $movie
     * @return mixed
     */
    public function restore(User $user, Movie $movie)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the movie.
     *
     * @param  \App\User  $user
     * @param  \App\Movie  $movie
     * @return mixed
     */
    public function forceDelete(User $user, Movie $movie)
    {
        //
    }
}
