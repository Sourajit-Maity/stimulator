<x-admin-layout title="SWS Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="SWS List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('sws.index') }}" value="SWS List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('sws.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New SWS
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:sws.sws-list/>
</x-admin-layout>