<?php


namespace App\Http\Controllers\Admin;


use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController
{
    public function index()
    {
        $donors = Donor::paginate(10);
        return view('admin.donors.index', ['donors' => $donors]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                Donor::create($request->all());
                $request->session()->flash('message', 'Successfully created organization');
                return redirect()->route('donors.index');
            } catch (\Exception $exception) {
                Log::error('Erro -> ' . json_encode(['Controller' => 'Donor.delete', $exception->getMessage()]));
            }
        }
        return view('admin.donors.create');
    }

    public function edit(Request $request, $id)
    {
        $product = Donor::find($id);
        if ($request->isMethod('post')) {
            try {
                if ($product) {
                    $product->update($request->all());
                }
                $request->session()->flash('message', 'Successfully updated organization');
                return redirect()->route('donors.index');
            } catch (\Exception $exception) {
                Log::error('Erro -> ' . json_encode(['Controller' => 'Donor.delete', $exception->getMessage()]));
            }
        }
        return view('admin.donors.edit', ['organization' => $product]);
    }

    public function remove($id)
    {
        $organization = Donor::find($id);
        try {
            if ($organization) {
                $organization->delete();
            }
        } catch (\Exception $exception) {
            Log::error('Erro -> ' . json_encode(['Controller' => 'Donor.delete', $exception->getMessage()]));
        }
        return redirect()->route('donors.index');
    }
}
