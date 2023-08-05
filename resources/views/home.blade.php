@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
    <div class="home container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Home') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="w-100 text-center">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Natus quod repellat vitae nisi ipsum minus accusamus, harum alias, exercitationem ipsam nemo laudantium vel maiores provident distinctio placeat molestiae autem. Repellendus fugiat dolorem natus aperiam vitae quibusdam consequuntur repellat expedita eum facere vel officiis harum suscipit inventore facilis recusandae deleniti pariatur non, velit dicta. Earum doloribus corrupti aliquid quos? Maiores, iure atque quasi aliquid nobis nostrum? Consequatur delectus odit numquam error temporibus, dolor corrupti facere blanditiis ipsam tenetur minima, aliquid quaerat laboriosam a corporis dolore modi quos suscipit repellat harum ullam, adipisci inventore. Nulla voluptatum maxime magni consectetur quas nihil culpa.
                        </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
