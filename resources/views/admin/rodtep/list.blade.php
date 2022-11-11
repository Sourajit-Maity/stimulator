<x-admin-layout title="Rodtep Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Rodtep List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('rodtep.index') }}" value="Rodtep List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('rodtep.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Rodtep
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:rodtep.rodtep-list/>
</x-admin-layout>