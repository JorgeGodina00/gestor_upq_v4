<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Documento;

class DocumentoController extends Controller
{
    public function index()
    {
        // Obtener los documentos del usuario autenticado
        $documentos = Documento::where('clave_profesor', Auth::id())->get();
        
        // Retornar la vista con los documentos
        return view('biblioteca', compact('documentos'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'subcategory' => 'required',
            'evidence' => 'required|file',
        ]);

        // Generar nombre de archivo según la codificación requerida
        $fileName = auth()->user()->id . '_' . date('Y') . '-' . $request->input('category') . '-' . $request->input('subcategory') . '_' . Documento::max('consecutivo') + 1 . '_' . time();

        // Subida del archivo
        $file = $request->file('evidence');
        $file->storeAs('documentos', $fileName); // Guarda el archivo en el directorio 'documentos'

        // Guardado en la base de datos
        $documento = new Documento();
        $documento->clave_profesor = auth()->user()->id;
        $documento->periodo = date('Y');
        $documento->clave_categoria = strtoupper($request->input('category'));
        $documento->clave_subcategoria = strtoupper($request->input('subcategory'));
        $documento->consecutivo = Documento::max('consecutivo') + 1;
        $documento->nombre_archivo = $fileName;
        $documento->ubicacion_archivo = 'documentos/' . $fileName;
        $documento->save();

        return redirect()->back()->with('success', 'Documento subido exitosamente.');
    }

}
