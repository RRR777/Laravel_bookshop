@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Books list </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('user.books.create') }}" title="Create a book"> <i class="fas fa-plus-circle"></i>
                    </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Cover</th>
            <th>Title</th>
            <th>Authors</th>
            <th>Genre</th>
            <th>Is new</th>
            <th>Is approved</th>
            <th>Price</th>
            <th width="280px">Action</th>
        </tr>
        @forelse ($books as $book)
            <tr>
                <td></td>
                <td><img src="{{ $book->cover ? $book->cover->getUrl('cover') : "" }}" width=40 hight=50 /></td>
                <td>{{ $book->title }}</td>
                <td>
                    @foreach ($book->authors as $author)
                        {{ $author->name }},
                    @endforeach
                </td>
                <td>
                    @foreach ($book->genres as $genre)
                        {{ $genre->name }},
                    @endforeach
                </td>
                <td>{{ $book->is_new ? "New" : "" }}</td>
                <td>
                    @if ($book->is_approved)
                        {{ __('Approved') }}
                    @else
                        {{ __('Pending') }}
                    @endif
                </td>
                <td>{{ $book->price }} Eur</td>
                <td>
                    <form action="{{ route('user.books.destroy', $book->id) }}" method="POST">
                        <a href="{{ route('user.books.show', $book->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>
                        <a href="{{ route('user.books.edit', $book->id) }}">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="9">{{ __('No books found') }}</td>
            </tr>
        @endforelse
    </table>

    {{ $books->links() }}

@endsection