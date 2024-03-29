@include('layouts.navbar')
<div class="w-9/12 rounded-lg justify-center mx-auto border-2 mt-8">
    <h1
        class="font-bold border-2 font-sans text-transparent text-2xl bg-clip-text
        bg-gradient-to-r from-gray-700 to-blue-800">
        EMPLOYEES
    </h1>
</div>

<div class="w-9/12 rounded-lg justify-center mx-auto border-2 mt-8 bg-amber-200">
    @if (session()->has('success'))
        <div class="alert alert-success mt-3 font-sans text-gray-700 text-2xl">
            {{ session('success') }}
        </div>
    @endif
</div>

<div class="w-9/12 rounded-lg justify-center mx-auto border-2 mt-8">

    <table class="w-full whitespace-nowrap">
        <tbody>
            @foreach ($employees as $employee)
                <tr tabindex="0" class="focus:outline-none h-16 mb-16">
                    <td class="">
                        <div class="flex items-start">
                            <p class="text-base font-medium leading-none text-gray-700   mr-2">
                                {{ $employee->name }}
                            </p>
                        </div>
                    </td>

                    <td class="">
                        <div class="flex items-start">
                            <p class="text-base font-medium leading-none text-gray-700   mr-2">
                                {{ $employee->description }}
                            </p>
                        </div>
                    </td>

                    <td class="pl-5">
                        <div class="flex items-center">
                            <p class="text-sm leading-none text-gray-600   ml-2">
                                {{ $employee->created_at }}</p>
                        </div>
                    </td>
                    <td class="pl-4 flex space-x-3 py-3">

                        <a href='{{ route('employees.show', $employee->id) }}'>
                            <x-table-button>
                                View
                            </x-table-button>
                        </a>
                        <a href='{{ route('employees.edit', $employee->id) }}'>
                            <x-table-button>
                                Edit
                            </x-table-button>
                        </a>
                        <form method="post" action="{{ route('employees.destroy', $employee->id) }}"
                            onsubmit="return confirm('Are You Sure Want To Delete ?');">
                            @csrf
                            @method('DELETE')
                            <x-table-button>
                                Delete
                            </x-table-button>
                        </form>
                        </a>

                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="w-9/12 rounded-lg justify-center mx-auto mt-8 ">
    <a href="{{ route('employees.create') }}">
        <x-page-button>
            Create
        </x-page-button>
    </a>

</div>
