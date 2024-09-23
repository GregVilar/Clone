<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Post') }}
        </h2>
    </x-slot>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container1 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        main {
            background-color: #111827;
        }        
        .header1 {
            padding: 20px 0;
            text-align: center;
        }
        .header h2 {
            font-size: 2em;
            color: #333;
        }
        .btn1 {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn1:hover {
            background-color: #0056b3;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
         td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            color: #FFFFFF;
        }
        th {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
            background-color: #f2f2f2;
        }
        .actions {
            display: flex;
            gap: 8px;
        }
    </style>

    <div class="container1">
        <div class="header1">
            <h2 style="color: white;">User List</h2> <br>
            <a href="/posts-create" class="btn1">Add a User</a>
        </div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->name }}</td>
                        <td>{{ $post->age }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->description }}</td>
                        <td class="actions">
                            <a href="/posts/{{ $post->id }}" class="btn1">View</a>
                            <a href="/posts/{{ $post->id }}/edit" class="btn1">Edit</a>
                            <!-- Delete button -->
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn1 btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
