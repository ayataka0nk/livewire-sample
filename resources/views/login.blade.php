<x-root>
  <h1>ログイン</h1>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <x-text-field type="email" label="Email" name="email" :value="old('email')" :error="$errors->first('email')" />
    <x-text-field type='password' label="Password" name="password" :value="old('password')" :error="$errors->first('password')" />
    <x-button>ログイン</x-button>
  </form>
</x-root>
