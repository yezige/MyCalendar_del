@extends('home.public.app')
@section('content')
<div class="row margin-t-20">
	<div class="small-8 medium-6 large-5 small-centered columns">
		<div class="panel callout radius">
			<div class="">
				<h3>
					Login
				</h3>
			</div>
			@if (count($errors) > 0)
			@foreach ($errors->all() as $error)
			<div data-alert class="alert-box alert radius">
				{{ $error }}
				<a href="#" class="close">
					&times;
				</a>
			</div>
			@endforeach
			@endif
			<form data-abide method="POST" action="{{ url('/auth/login') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="email-field">
					<label for="email">E-Mail Address <small>必填</small>
						<input type="email" name="email" value="{{ old('email') }}" placeholder="somebody@example.com" required>
					</label>
					<small class="error">邮箱必填吆，亲</small>
				</div>
				<div>
					<label for="password">Password <small>必填</small>
						<input type="password" name="password" value="{{ old('email') }}" placeholder="Password" required>
					</label>
					<small class="error">密码必填吆，亲</small>
				</div>
				<label>
					<input type="checkbox" name="remember">
					Remember Me
				</label>
				<p>
					<button type="submit" class="button radius">
						Log In
					</button>
					<a href="{{ url('/password/email') }}">
						Forgot your password?
					</a>
				</p>
			</form>
		</div>
	</div>
</div>
@endsection
