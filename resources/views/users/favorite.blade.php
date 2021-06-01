@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            {{-- ユーザ情報 --}}
            @include('users.card')
        </aside>
        <div class="col-sm-8">
            {{-- タブ --}}
            @include('users.navtabs')
            {{-- favo一覧 --}}
            @if (count($microposts) > 0)
                <ul class="list-unstyled">
                    @foreach ($microposts as $micropost)
                        <li class="media mb-3">
                            
                            <div class="media-body">
                                <div>
                                    {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                                    {!! link_to_route('users.show', $micropost->user->name, ['user' => $micropost->user->id]) !!}
                                    <span class="text-muted">posted at {{ $micropost->created_at }}</span>
                                </div>
                                <div>
                                    {{-- 投稿内容 --}}
                                    <p class="mb-0">{!! nl2br(e($micropost->content)) !!}
                                    
                                     </p>
                                    
                                </div>
                                <div>
                                     @include('microposts.favorite')
                                
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
    {{-- ページネーションのリンク --}}
    {{ $microposts->links() }}
@endif
        </div>
    </div>
@endsection