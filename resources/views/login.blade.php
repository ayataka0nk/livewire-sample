<x-root>
  <h1>ログイン</h1>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <x-text-field label="Email" name="email" :error="$errors->first('email')" />
    <x-text-field label="Password" name="password" :error="$errors->first('password')" />
    <x-button>ログイン</x-button>
  </form>
</x-root>
