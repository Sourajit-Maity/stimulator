<x-admin-layout title="Imported Duty Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $imported ? 'Edit' : 'Add' }} Imported Duty">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('imported.index') }}" value="Imported Duty List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $imported ? 'Edit' : 'Add' }} Imported Duty" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:imported.imported-create-edit :imported="$imported"/>
</x-admin-layout>