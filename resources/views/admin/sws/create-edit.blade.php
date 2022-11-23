<x-admin-layout title="SWS Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $sws ? 'Edit' : 'Add' }} SWS">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('sws.index') }}" value="SWS List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $sws ? 'Edit' : 'Add' }} SWS" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:sws.sws-create-edit :sws="$sws"/>
</x-admin-layout>