<x-admin-layout title="Air Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $air ? 'Edit' : 'Add' }} Air">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('air.index') }}" value="Air List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $air ? 'Edit' : 'Add' }} Air" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:air.air-create-edit :air="$air"/>
</x-admin-layout>