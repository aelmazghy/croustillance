<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Str;
use File;

class ArticleController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get news
        $articles = Article::all();
        return view('gest.articles.index', compact('articles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // $article = new Article();
        return view('gest.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd(request()->all());
        /**/
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'imag' => ['required', 'image'],
            'imgAlt' => 'nullable',
            'datenews' => ['required', 'date'],
            'urlType' => 'required',
            'urltext' => 'nullable',
            'urlLink' => 'nullable',
        ]);

        $imageFile = $request->file('imag');
        $imagename = Str::uuid() . '.' . $request->file('imag')->extension();
        $imagePath = public_path() . '/articles/img/';
        $imageFile->move($imagePath, $imagename);

        $article = new Article;

        $article->title = $data['title'];
        $article->description = $data['description'];
        $article->imag = '/articles/img/' . $imagename;
        $article->datenews = $data['datenews'];
        $article->imgAlt = $data['imgAlt'];
        $article->urlType = $data['urlType'];
        $article->urltext = $data['urltext'];
        $article->urlLink = $data['urlLink'];

        if ($request->file('pdf')) {
            $pdf = $request->file('pdf');
            $filename = Str::uuid() . '.' . $request->file('pdf')->extension();
            $filePath = public_path() . '/articles/pdf/';
            $pdf->move($filePath, $filename);
            $article->urlLink = '/articles/pdf/' . $filename;
        }
        $article->save();

        return redirect()->route('articles');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
