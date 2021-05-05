<?php


namespace App\Http\Controllers\Admin;


class OrganizationController
{
    public function index()
    {
        $products = Organization::paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

    public function remove($id)
    {
        $product = Organization::find($id);
        try {
            if ($product) {
                $product->delete();
            }
        } catch (\Exception $exception) {
            Log::error('Erro -> ' . json_encode(['Controller' => 'Organization.delete', $exception->getMessage()]));
        }
        return redirect()->route('organizations.index');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                Organization::create($request->all());
                $request->session()->flash('message', 'Successfully created organization');
                return redirect()->route('organizations.index');
            } catch (\Exception $exception) {
                Log::error('Erro -> ' . json_encode(['Controller' => 'Organization.delete', $exception->getMessage()]));
            }
        }
        return view('admin.organizations.create');
    }

    public function edit(Request $request, $id)
    {
        $product = Organization::find($id);
        if ($request->isMethod('post')) {
            try {
                if ($product) {
                    $product->update($request->all());
                }
                $request->session()->flash('message', 'Successfully updated organization');
                return redirect()->route('organizations.index');
            } catch (\Exception $exception) {
                dd($exception->getMessage());
                Log::error('Erro -> ' . json_encode(['Controller' => 'Organization.delete', $exception->getMessage()]));
            }
        }
        return view('admin.organizations.edit', ['organization' => $product]);
    }
}
