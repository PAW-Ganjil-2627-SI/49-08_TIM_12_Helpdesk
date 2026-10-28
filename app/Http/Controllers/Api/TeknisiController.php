<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teknisi;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeknisiController extends Controller
{
    /** GET /api/teknisi : daftar teknisi dan statusnya (opsional ?status=tersedia|sibuk|libur). */
    public function index(Request $request): JsonResponse
    {
        $request->validate([
            'status' => ['nullable', Rule::in(Teknisi::STATUS)],
        ]);

        $teknisi = Teknisi::query()
            ->when($request->query('status'), fn ($q, $status) => $q->where('status', $status))
            ->orderBy('nama')
            ->get(['id', 'nama', 'spesialisasi', 'status']);

        return response()->json(['data' => $teknisi]);
    }

    /** GET /api/teknisi/{id} : detail profil dan keahlian. */
    public function show(Teknisi $teknisi): JsonResponse
    {
        return response()->json(['data' => [
            'id'           => $teknisi->id,
            'nama'         => $teknisi->nama,
            'spesialisasi' => $teknisi->spesialisasi,
            'email'        => $teknisi->email,
            'telepon'      => $teknisi->telepon,
            'status'       => $teknisi->status,
            'user_id'      => $teknisi->user_id,
        ]]);
    }

    /** PUT /api/teknisi/{id}/status : ubah status. Hanya admin atau teknisi pemilik akun. */
    public function updateStatus(Request $request, Teknisi $teknisi): JsonResponse
    {
        $user = $request->user();

        abort_unless(
            $user->role === 'admin' || ($teknisi->user_id !== null && $teknisi->user_id === $user->id),
            403,
            'Anda tidak berhak mengubah status teknisi ini.'
        );

        $data = $request->validate([
            'status' => ['required', Rule::in(Teknisi::STATUS)],
        ], [
            'status.required' => 'Status wajib diisi.',
            'status.in'       => 'Status harus tersedia, sibuk, atau libur.',
        ]);

        $teknisi->update($data);

        return response()->json([
            'message' => 'Status teknisi diperbarui.',
            'data'    => $teknisi->only(['id', 'nama', 'status']),
        ]);
    }
}
