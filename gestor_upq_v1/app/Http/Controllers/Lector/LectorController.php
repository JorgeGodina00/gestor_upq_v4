<?php

namespace App\Http\Controllers\Lector;
use App\Models\Documento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LectorController extends Controller
{
    //
    public function index(Request $request)
    {
        // Obtener los parámetros de búsqueda
        $clave_profesor = $request->input('clave_profesor');
        $clave_categoria = $request->input('clave_categoria');
        $clave_subcategoria = $request->input('clave_subcategoria');

        // Filtrar los documentos según los criterios de búsqueda
        $documentos = Documento::query();

        if ($clave_profesor) {
            $documentos->where('clave_profesor', 'LIKE', "%$clave_profesor%");
        }

        if ($clave_categoria) {
            $documentos->where('clave_categoria', 'LIKE', "%$clave_categoria%");
        }

        if ($clave_subcategoria) {
            $documentos->where('clave_subcategoria', 'LIKE', "%$clave_subcategoria%");
        }

        // Obtener los documentos paginados
        $documentos = $documentos->paginate(10); // Cambia 10 por el número de documentos por página que desees

        // Pasar los documentos a la vista
        return view('lector.biblioteca', compact('documentos'));
    }
}
