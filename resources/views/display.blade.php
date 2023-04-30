<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>API TESTING | NGINX + Laravel + Docker + MySQL Server</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    {{-- Title of the page --}}
    <div class="flex items-center justify-center my-10">
        <h1 class="text-3xl font-bold text-gray-700">API TESTING</h1>
    </div>

    {{-- Input form for inserting new data to database --}}
    <div class="mx-32 mb-5">
        <form action="{{ url('posts/store') }}" method="POST"
            class="ring-2 ring-slate-900/10 shadow-xl rounded px-7 py-7 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Title
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="title" type="text" placeholder="Nganu, pak, ini untuk judul ...">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                    Content
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    name="content" type="text" placeholder="Nah, kalau yang ini buat kontennya pak ...">
            </div>

            <div class="flex items-center justify-center">
                <button
                    class="text-xs ring-3 ring-gray-700 hover:ring-2 hover:ring-gray-500 text-black font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    INSERT
                </button>
            </div>
        </form>

        {{-- Displaying data from database, all of the data --}}
        <table class="rounded border-collapse ring-2 ring-gray-700 w-full text-sm text-left">
            <thead class="text-xs text-white text-gray-700 uppercase bg-gray-50 bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="text-center px-2 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Title</th>
                    <th scope="col" class="px-6 py-3">Content</th>
                    <th scope="col" class="text-center px-6 py-3">JSON</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($posts as $post)
                    <tr border-t-1>
                        <td class="text-center px-2 py-2">{{ $post->id }}</td>
                        <td class="px-6 py-2 overflow-hidden">{{ $post->title }}</td>
                        <td class="px-6 py-2 overflow-hidden">{{ $post->content }}</td>

                        {{-- Shows JSON response --}}
                        <td class="text-center px-6 py-2 overflow-hidden">
                            <a href="{{ url('api/v1/posts/' . $post->id) }}">
                                <button
                                    class="inline-flex text-xs font-bold items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-800 text-sm font-medium rounded-md">
                                    JSON
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
