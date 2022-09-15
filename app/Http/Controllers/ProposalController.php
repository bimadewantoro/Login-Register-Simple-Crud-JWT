<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proposals = Proposal::all();
        return response()->json([
            'success' => true,
            'message' => 'Daftar Semua Proposal',
            'data' => $proposals
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'ink_judul' => 'required',
            'ink_abstrak' => 'required',
            'ink_latarbelakang' => 'required',
            'ink_tujuan' => 'required',
            'ink_manfaat' => 'required',
            'ink_metode' => 'required',
            'ink_keunggulan' => 'required',
            'ink_penerapan' => 'required',
            'ink_prospek' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $proposal = Proposal::create([
            'user_id' => auth()->user()->id,
            'ink_judul' => $request->ink_judul,
            'ink_abstrak' => $request->ink_abstrak,
            'ink_latarbelakang' => $request->ink_latarbelakang,
            'ink_tujuan' => $request->ink_tujuan,
            'ink_manfaat' => $request->ink_manfaat,
            'ink_metode' => $request->ink_metode,
            'ink_keunggulan' => $request->ink_keunggulan,
            'ink_penerapan' => $request->ink_penerapan,
            'ink_prospek' => $request->ink_prospek,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Proposal berhasil dibuat',
            'data' => $proposal
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function show(Proposal $proposal)
    {
        $proposal = Proposal::find($proposal->id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Proposal',
            'data' => $proposal
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function edit(Proposal $proposal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proposal $proposal)
    {
       $validator = Validator::make(request()->all(), [
            'ink_judul' => 'required',
            'ink_abstrak' => 'required',
            'ink_latarbelakang' => 'required',
            'ink_tujuan' => 'required',
            'ink_manfaat' => 'required',
            'ink_metode' => 'required',
            'ink_keunggulan' => 'required',
            'ink_penerapan' => 'required',
            'ink_prospek' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first(),
            ], 400);
        }

        $proposal = Proposal::find($proposal->id);
        $proposal->update([
            'user_id' => auth()->user()->id,
            'ink_judul' => $request->ink_judul,
            'ink_abstrak' => $request->ink_abstrak,
            'ink_latarbelakang' => $request->ink_latarbelakang,
            'ink_tujuan' => $request->ink_tujuan,
            'ink_manfaat' => $request->ink_manfaat,
            'ink_metode' => $request->ink_metode,
            'ink_keunggulan' => $request->ink_keunggulan,
            'ink_penerapan' => $request->ink_penerapan,
            'ink_prospek' => $request->ink_prospek,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Proposal berhasil diupdate',
            'data' => $proposal
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proposal  $proposal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proposal $proposal)
    {
        $proposal = Proposal::find($proposal->id);
        $proposal->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Proposal berhasil dihapus',
            'data' => $proposal
        ], 200);
    }
}
