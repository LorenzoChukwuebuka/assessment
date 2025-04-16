<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Task",
 *     title="Task",
 *     description="Task model",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Finish project"),
 *     @OA\Property(property="description", type="string", example="Complete the task management module"),
 *     @OA\Property(property="status", type="string", example="pending"),
 *     @OA\Property(property="due_date", type="string", format="date", example="2025-04-20"),
 *     @OA\Property(property="user_id", type="integer", example=3),
 *     @OA\Property(property="created_at", type="string", format="date-time", example="2025-04-16T12:00:00Z"),
 *     @OA\Property(property="updated_at", type="string", format="date-time", example="2025-04-16T12:30:00Z")
 * )
 */

class Tasks extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'due_date',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'due_date' => 'date',
    ];

    /**
     * Get the user that owns the task.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}