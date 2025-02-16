<?php

namespace App\Http\Controllers\PTC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Documento;

class PTCController extends Controller
{
    // Método para mostrar la vista de la biblioteca
    public function index()
    {
        // Obtener los documentos del PTC autenticado
        $documentos = Documento::where('clave_profesor', Auth::id())->get();
        return view('ptc.ptcdashboard', compact('documentos'));
    }

    // Método para manejar la subida de documentos de la categoría Docencia
    public function storeDocencia(Request $request)
    {
        return $this->store($request, 'docencia');
    }

    // Método para manejar la subida de documentos de la categoría Gestión
    public function storeGestion(Request $request)
    {
        return $this->store($request, 'gestion');
    }

    // Método para manejar la subida de documentos de la categoría Tutoría
    public function storeTutoria(Request $request)
    {
        return $this->store($request, 'tutoria');
    }

    // Método para manejar la subida de documentos de la categoría Investigación
    public function storeInvestigacion(Request $request)
    {
        return $this->store($request, 'investigacion');
    }

    // Método para manejar la lógica de subida de documentos
    protected function store(Request $request, $categoria)
    {
        // Validación de datos
        $request->validate([
            'subcategory' => 'required',
            'evidence' => 'required|file',
        ]);

        // Mapeo de las subcategorías a sus claves
        $subcategoriaClaves = $this->getSubcategoriaClaves($categoria);

        // Determinar la clave de la subcategoría según la categoría
        $clave_subcategoria = $subcategoriaClaves[$request->input('subcategory')] ?? 'default';

        // Obtener el periodo actual (mes y año)
        $periodo = date('mY');

        // Obtener el ID del usuario autenticado
        $clave_profesor = Auth::id();

        // Generar nombre de archivo según la codificación requerida
        $fileName = $clave_profesor . '_' . $periodo . '-' . strtoupper(substr($categoria, 0, 2)) . '-' . $clave_subcategoria . '_' . (Documento::max('consecutivo') + 1);

        // Subida del archivo
        $file = $request->file('evidence');
        $file->storeAs('documentos', $fileName); // Guarda el archivo en el directorio 'documentos'

        // Guardado en la base de datos
        $documento = new Documento();
        $documento->clave_profesor = $clave_profesor;
        $documento->periodo = $periodo;
        $documento->clave_categoria = strtoupper(substr($categoria, 0, 2)); // Establece la categoría
        $documento->clave_subcategoria = $clave_subcategoria;
        $documento->consecutivo = Documento::max('consecutivo') + 1;
        $documento->nombre_archivo = $fileName;
        $documento->ubicacion_archivo = 'documentos/' . $fileName;
        $documento->save();

        return redirect()->back()->with('success', 'Documento subido exitosamente.');
    }

    // Método para obtener las claves de las subcategorías según la categoría
    protected function getSubcategoriaClaves($categoria)
    {
        switch ($categoria) {
            case 'docencia':
                return [
                    'actualizacion_curricular_disciplinar' => 'acd',
                    'actualizacion_didactica_pedagogica' => 'adp',
                    'actualizacion_en_lenguas_extranjeras' => 'ale',
                    'trayectoria_academica' => 'ree',
                ];
            case 'gestion':
                return [
                    'gestion_programa_educativo' => 'gpe',
                    'gestion_institucional' => 'otr',
                    'creacion_actualizacion_programas' => 'ape',
                    'cuerpo_academico_formacion' => 'mfo',
                    'direccion_coord_supervision' => 'dcs',
                    'evento_academico_externo' => 'eae',
                    'evento_academico_internacional' => 'pin',
                    'cipp' => 'cip',
                ];
            case 'tutoria':
                return [
                    'tutoria_grupal' => 'tgr',
                    'tutoria_individual' => 'tin',
                ];
            case 'investigacion':
                return [
                    'encuentros_academicos' => 'eac',
                    'articulos_informes_libros' => 'mex',
                    'direccion_individualizada_licenciatura' => 'dil',
                    'codireccion_individualizada_licenciatura' => 'cil',
                    'redes_academicas_colaboracion' => 'rac',
                    'participacion_cuerpos_academicos' => 'pea',
                    'participacion_cursos_extension' => 'pce',
                    'reconocimiento_local_estudiantes' => 'rle',
                    'reconocimiento_nacional_estudiantes' => 'rne',
                    'reconocimiento_internacional_estudiantes' => 'rie',
                    'proyectos_investigacion' => 'pro',
                    'modelo_gestion_academica' => 'mga',
                    'material_didactico_asignatura' => 'mda',
                    'obra_artistica' => 'oar',
                    'modelo_diseno_industrial' => 'mdi',
                    'modelo_utilidad_prototipo' => 'mdp',
                    'patente' => 'pat',
                ];
            default:
                return [];
        }
    }
}
