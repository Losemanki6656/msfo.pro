@extends('layouts.master')

@section('content')
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Вопросы</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="/"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Вопросы</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-10 mx-auto">
            <div class="row">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0">
                    </h5>
                    <form class="mx-auto position-relative">
                    </form>
                </div>
            </div>
            @foreach ($tasks as $item)
                <div class="alert border-0 bg-warning alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="fs-3 text-dark"><i class="bi bi-exclamation-triangle-fill"></i>
                        </div>
                        <div class="ms-3">
                            <div class="text-dark fw-bold">
                                Вопрос - №{{ $loop->index + 1 }}
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close"></button>
                </div>
                {{ $tasks->withQueryString()->links() }}

                <label class="fw-bold text-dark"> Вопрос</label>
                {!! $item->ques !!}

                <div class="mb-3">
                    <label class="fw-bold text-success"> Ответ</label> <br>
                    {!! $item->result !!}
                </div>
            @endforeach

            <div class="mb-3">
                <label class="fw-bold text-primary">Ответ</label>
                @foreach ($result as $res)
                    <h6>
                        @if ($res->startMavzu->status_ret == true)
                            <span class="text-danger">(Повтор)</span>
                        @endif
                        {{ $loop->index + 1 }}: 
                      <textarea class="form-control" rows="7" readonly="true">{{ $res->result }}</textarea>
                        <br style="margin-bottom: 5px">
                        @if ($res->file1)
                            <a href="{{ asset($res->file1) }}"> Файл 1 </a>
                        @endif
                        <br style="margin-bottom: 5px">
                        @if ($res->file2)
                            <a href="{{ asset($res->file2) }}"> Файл 2 </a>
                        @endif
                    </h6>
                @endforeach
            </div>

            @if (count($result))
                <div class="mb-3">
                    <form action="{{ route('taskSucc', ['id' => $result[0]->id]) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="number" name="ball" value="{{ $result[0]->ball }}" class="form-control" placeholder="Ball">
                            </div>
                            <div class="col">
                                <button name="dan" value="true" class="btn btn-danger" type="submit"
                                    style="width: 100%">
                                    Не правильно</button>
                            </div>
                            <div class="col">
                                <button name="succ" value="true" class="btn btn-success" type="submit"
                                    style="width: 100%"> Правильно</button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif

        </div>
    </div>
@endsection

@section('scripts')
@endsection
