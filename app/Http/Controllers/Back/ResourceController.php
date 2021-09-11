<?php
namespace App\Http\Controllers\Back;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\DataTables\UsersDataTable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class ResourceController extends Controller
{
    protected $dataTable;
    protected $view;
    protected $formRequest;
    protected $singular;
    public function __construct()
    {
        if (!app()->runningInConsole()) {
            $segment = getUrlSegment(request()->url(), 1); // categories ou newcategories
            if (substr($segment, 0, 3) === 'new') {
                $segment = substr($segment, 3);
            }
            $name = substr($segment, 0, -1); // categorie
            $this->singular = Str::singular($segment); // category
            $model = ucfirst($this->singular); // Category
            $this->model = 'App\Models\\' . $model;
            $this->dataTable = 'App\DataTables\\' . ucfirst($name) . 'sDataTable';
            $this->view = 'back.users.form';
            $this->formRequest = 'App\Http\Requests\Back\\' . $model . 'Request';
        }
    }
    public function index()
    {
        return app()->make('App\DataTables\UsersDataTable')->render('back.shared.index');
    }
public function create()
{
    return view($this->view);
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'role' => 'required',
    ]);

    User::create($request->all());
    return back()->with(['ok' => __('The user has been successfully updated.')]);
}
// public function edit($id)
// {
//     $element = app()->make('App\Models\User')->find($id);
//     return view('back.users.form1', ['user' => $element]);
// }

public function update($id)
{
    $request = app()->make($this->formRequest);
    app()->make($this->model)->find($id)->update($request->all());
    return back()->with(['ok' => __('The ' . $this->singular . ' has been successfully updated.')]);
}
public function destroy($id)
{
    app()->make('App\Models\User')->find($id)->delete();
    return response()->json();
}
}
