<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="Task",
 *     title="Task",
 *     type="object",
 *     required={"title"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="Tugas Teori Basis Data"),
 *     @OA\Property(property="description", type="string", example="Deskripsi tugas"),
 *     @OA\Property(property="is_done", type="boolean", example=false),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class Task {}
