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

        // Mapeo de las subcategorías a sus claves
        $subcategoriaClavesDocencia = [
            'actualizacion_curricular_disciplinar' => 'acd',
            'actualizacion_didactica_pedagogica' => 'adp',
            'actualizacion_en_lenguas_extranjeras' => 'ale',
            'trayectoria_academica' => 'ree',
        ];

        $subcategoriaClavesInvestigacion = [
            'encuentros_academicos' => 'eac',
            'articulos_informes_libros' => 'mex',
            'direccion_individualizada_licenciatura' => 'dil',
            'codireccion_individualizada_licenciatura' => 'CIL',
            'redes_academicas_colaboracion' => 'RAC',
            'participacion_cuerpos_academicos' => 'PEA',
            'participacion_cursos_extension' => 'pce',
            'reconocimiento_local_estudiantes' => 'rle',
            'reconocimiento_nacional_estudiantes' => 'rne',
            'reconocimiento_internacional_estudiantes' => 'rie',
            'proyectos_investigacion' => 'pro',
            'modelo_gestion_academica' => 'MGA',
            'material_didactico_asignatura' => 'MDA',
            'obra_artistica' => 'oar',
            'modelo_diseno_industrial' => 'mdi',
            'modelo_utilidad_prototipo' => 'mdp',
            'patente' => 'pat',
        ];

        // Determinar la clave de la subcategoría según la categoría
        $category = $request->input('category');
        if ($category == 'docencia') {
            $clave_subcategoria = $subcategoriaClavesDocencia[$request->input('subcategory')] ?? 'default';
        } elseif ($category == 'investigacion') {
            $clave_subcategoria = $subcategoriaClavesInvestigacion[$request->input('subcategory')] ?? 'default';
        } else {
            $clave_subcategoria = 'default';
        }

        // Obtener el periodo actual (mes y año)
        $periodo = date('mY');

        // Obtener el ID del usuario autenticado
        $clave_profesor = auth()->user()->id;

        // Generar nombre de archivo según la codificación requerida
        $fileName = $clave_profesor . '_' . $periodo . '-IN-' . $clave_subcategoria . '_' . (Documento::max('consecutivo') + 1) . '_' . time();

        // Subida del archivo
        $file = $request->file('evidence');
        $file->storeAs('documentos', $fileName); // Guarda el archivo en el directorio 'documentos'

        // Guardado en la base de datos
        $documento = new Documento();
        $documento->clave_profesor = auth()->user()->id;
        $documento->periodo = $periodo;
        $documento->clave_categoria = strtoupper($request->input('category'));
        $documento->clave_subcategoria = $clave_subcategoria;
        $documento->consecutivo = Documento::max('consecutivo') + 1;
        $documento->nombre_archivo = $fileName;
        $documento->ubicacion_archivo = 'documentos/' . $fileName;
        $documento->save();

        return redirect()->back()->with('success', 'Documento subido exitosamente.');
    }
}
