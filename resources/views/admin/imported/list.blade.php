<x-admin-layout title="Imported Duty Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Imported Duty List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('imported.index') }}" value="Imported Duty List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('imported.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Imported Duty
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:imported.imported-list/>
</x-admin-layout>