<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // buat semua kolom wajib diisi, setel file info agar hanya menerima file
            'content' => 'required|string|min:3|max:255', // panjang minimum 3 karakter, panjang maksimum 255 karakter
            'info_file' => 'nullable|file|max:1024|mimes:pdf,docx,doc,xlsx,xls', // opsional, hanya file, ukuran maksimal 1024 KB, dengan beberapa tipe mime yang diperbolehkan
        ];
    }
}
