<x-admin-layout title="Rodtep Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $rodtep ? 'Edit' : 'Add' }} Rodtep">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('rodtep.index') }}" value="Rodtep List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $rodtep ? 'Edit' : 'Add' }} Rodtep" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:rodtep.rodtep-create-edit :rodtep="$rodtep"/>
</x-admin-layout>