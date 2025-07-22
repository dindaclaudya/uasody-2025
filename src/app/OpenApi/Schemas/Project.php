<?php

namespace App\OpenApi\Schemas;

/**
 * @OA\Schema(
 *     schema="Project",
 *     title="Project",
 *     type="object",
 *     required={"name"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Proyek Basis Data"),
 *     @OA\Property(property="description", type="string", example="Proyek besar mata kuliah"),
 *     @OA\Property(property="deadline", type="string", format="date", example="2025-08-15"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class Project {}
