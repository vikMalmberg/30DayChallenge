<nav class="flex items-center justify-between flex-wrap bg-teal p-6">
          <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
              <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
          </div>
          <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
              <a href="{{route('personal.challenges.index')}}" class="block mt-4 lg:inline-block no-underline lg:mt-0 text-teal-lighter hover:text-white mr-4">
                My Challenges
              </a>
              <a href="{{route('challenges.index')}}" class="block mt-4 lg:inline-block no-underline lg:mt-0 text-teal-lighter hover:text-white mr-4">
                Challenges
              </a>
              <a href="{{route('challenges.create')}}" class="block mt-4 lg:inline-block lg:mt-0 no-underline text-teal-lighter hover:text-white mr-4">
                Create
              </a>
            </div>
            <div>
              <a href="/profile" class="inline-block text-sm px-4 py-2 leading-none border rounded no-underline text-white border-white hover:border-transparent hover:text-teal hover:bg-white ml-4 mt-4 lg:mt-0">Profile</a>
              <a href="/logout" class="inline-block text-sm px-4 py-2 leading-none border rounded no-underline text-white border-white hover:border-transparent hover:text-teal hover:bg-white ml-4 mt-4 lg:mt-0">Sign out</a>
            </div>
          </div>
        </nav>
