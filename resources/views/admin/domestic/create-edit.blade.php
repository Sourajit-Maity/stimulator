<x-admin-layout title="Domestic Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $domestic ? 'Edit' : 'Add' }} Domestic">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('domestic.index') }}" value="Domestic List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $domestic ? 'Edit' : 'Add' }} Domestic" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:domestic.domestic-create-edit :domestic="$domestic"/>
</x-admin-layout>