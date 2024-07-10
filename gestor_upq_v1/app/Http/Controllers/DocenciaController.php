<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Documento;

class DocenciaController extends Controller
{
    public function index()
    {
        // Obtener los documentos de docencia del usuario autenticado
        $documentos = Documento::where('clave_profesor', Auth::id())
                               ->where('clave_categoria', 'DO')
                               ->get();
        
        // Retornar la vista con los documentos de docencia
        return view('docencia.index', compact('documentos'));
    }

    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'subcategory' => 'required',
            'evidence' => 'required|file',
        ]);

        // Mapeo de subcategorías abreviadas
        $subcategorias = [
            'actualizacion_curricular_disciplinar' => 'ACD',
            'actualizacion_didactica_pedagogica' => 'ADP',
            'actualizacion_en_lenguas_extranjeras' => 'AEE',
            'certificacion_de_ingles_avanzado' => 'CIA',
            'programa_de_trabajo' => 'PDT',
            'reconocimiento_interno' => 'RI',
            'evaluacion_docente' => 'ED',
            'evaluacion_a_titulo_de_competencia' => 'ETC',
            'clase_frente_a_grupo_en_la_universidad' => 'CFGU',
        ];

        // Obtener la abreviatura de la subcategoría
        $subcategory = $request->input('subcategory');
        $clave_subcategoria = $subcategorias[$subcategory] ?? '';

        // Generar nombre de archivo según la codificación requerida
        $fileName = auth()->user()->id . '_' . date('Y') . '-DO-' . $clave_subcategoria . '_' . (Documento::max('consecutivo') + 1) . '_' . time();

        // Subida del archivo
        $file = $request->file('evidence');
        $file->storeAs('documentos', $fileName); // Guarda el archivo en el directorio 'documentos'

        // Guardado en la base de datos
        $documento = new Documento();
        $documento->clave_profesor = auth()->user()->id;
        $documento->periodo = date('Y');
        $documento->clave_categoria = 'DO';
        $documento->clave_subcategoria = $clave_subcategoria;
        $documento->consecutivo = Documento::max('consecutivo') + 1;
        $documento->nombre_archivo = $fileName;
        $documento->ubicacion_archivo = 'documentos/' . $fileName;
        $documento->save();

        return redirect()->back()->with('success', 'Documento de docencia subido exitosamente.');
    }
}
