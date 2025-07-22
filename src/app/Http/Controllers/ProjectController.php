<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Projects",
 *     description="Manajemen Proyek"
 * )
 */
class ProjectController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/projects",
     *     tags={"Projects"},
     *     summary="Ambil semua proyek",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Response(response=200, description="Berhasil")
     * )
     */
    public function index()
    {
        return response()->json(Project::all());
    }

    /**
     * @OA\Post(
     *     path="/api/projects",
     *     tags={"Projects"},
     *     summary="Tambah proyek baru",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             required={"name"},
     *             @OA\Property(property="name", type="string", example="Proyek Basis Data"),
     *             @OA\Property(property="description", type="string", example="Proyek besar mata kuliah"),
     *             @OA\Property(property="deadline", type="string", format="date", example="2025-08-15")
     *         )
     *     ),
     *     @OA\Response(response=201, description="Proyek disimpan")
     * )
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'deadline' => 'nullable|date',
        ]);

        $project = Project::create($data);
        return response()->json($project, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/projects/{id}",
     *     tags={"Projects"},
     *     summary="Detail proyek",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Berhasil"),
     *     @OA\Response(response=404, description="Tidak ditemukan")
     * )
     */
    public function show($id)
    {
        return response()->json(Project::findOrFail($id));
    }

    /**
     * @OA\Put(
     *     path="/api/projects/{id}",
     *     tags={"Projects"},
     *     summary="Update proyek",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string", example="Nama Baru"),
     *             @OA\Property(property="description", type="string", example="Deskripsi baru"),
     *             @OA\Property(property="deadline", type="string", format="date", example="2025-09-01")
     *         )
     *     ),
     *     @OA\Response(response=200, description="Berhasil")
     * )
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        $project->update($request->all());
        return response()->json($project);
    }

    /**
     * @OA\Delete(
     *     path="/api/projects/{id}",
     *     tags={"Projects"},
     *     summary="Hapus proyek",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Berhasil dihapus")
     * )
     */
    public function destroy($id)
    {
        Project::destroy($id);
        return response()->json(null, 204);
    }
}
