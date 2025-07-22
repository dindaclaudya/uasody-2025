<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

/**
 * @OA\Tag(
 *     name="Tasks",
 *     description="Manajemen Tugas"
 * )
 */
class TaskController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/tasks",
     *     tags={"Tasks"},
     *     summary="Ambil semua tugas",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Response(response=200, description="Berhasil")
     * )
     */
    public function index()
    {
        return response()->json(Task::all());
    }

    /**
     * @OA\Post(
     *     path="/api/tasks",
     *     tags={"Tasks"},
     *     summary="Tambah tugas baru",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             required={"title"},
     *             @OA\Property(property="title", type="string", example="Tugas Teori Basis Data"),
     *             @OA\Property(property="description", type="string", example="Kumpulkan minggu depan"),
     *             @OA\Property(property="is_done", type="boolean", example=false)
     *         )
     *     ),
     *     @OA\Response(response=201, description="Tugas disimpan")
     * )
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'is_done' => 'boolean',
        ]);

        $task = Task::create($data);
        return response()->json($task, 201);
    }

    /**
     * @OA\Get(
     *     path="/api/tasks/{id}",
     *     tags={"Tasks"},
     *     summary="Detail tugas",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=200, description="Berhasil"),
     *     @OA\Response(response=404, description="Tidak ditemukan")
     * )
     */
    public function show($id)
    {
        return response()->json(Task::findOrFail($id));
    }

    /**
     * @OA\Put(
     *     path="/api/tasks/{id}",
     *     tags={"Tasks"},
     *     summary="Update tugas",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\RequestBody(
     *         @OA\JsonContent(
     *             @OA\Property(property="title", type="string", example="Judul Baru"),
     *             @OA\Property(property="description", type="string", example="Deskripsi baru"),
     *             @OA\Property(property="is_done", type="boolean", example=true)
     *         )
     *     ),
     *     @OA\Response(response=200, description="Berhasil")
     * )
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json($task);
    }

    /**
     * @OA\Delete(
     *     path="/api/tasks/{id}",
     *     tags={"Tasks"},
     *     summary="Hapus tugas",
     *     security={{"ApiKeyAuth": {}}},
     *     @OA\Parameter(name="id", in="path", required=true, @OA\Schema(type="integer")),
     *     @OA\Response(response=204, description="Berhasil dihapus")
     * )
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return response()->json(null, 204);
    }
}
