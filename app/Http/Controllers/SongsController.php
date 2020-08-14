<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongRequest;
use Illuminate\Http\Request;
use App\Http\Repository\SongsRepository;

class SongsController extends Controller
{
    /**
     * Комментарий
     * Задание просто, но кучу времеи убил на мелочи.
     * Что еще и как бы сделал:
     *  - добавить класс трансформер для выдачи данных в json
     *  - добавить авторизацию по логину, паролю. в ответ получать токен, по токену получать данные (совсем в идеале создать еще синхронизаор для токена и хранить его в сессии)
     *  - добавить мемкешд и закешировать данные
     *  - добавить возможность фильтровать оп определенным условиям
     *  - и много чего еще хорошего могу придумать:)
     */



    /**
     * @var SongsRepository
     */
    protected $songsRepository;

    /**
     * SongsController constructor.
     */
    public function __construct()
    {
        $this->songsRepository = app(SongsRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all();

        $info = $this->songsRepository->all($data);

        return $info->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SongRequest $request)
    {
        $info = $this->songsRepository->create($request->all());

        return $info->toJson();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = $this->songsRepository->show((int)$id);

        return $info->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SongRequest $request, $id)
    {
        $info = $this->songsRepository->update($id, $request->all());

        return $info->toJson();
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
