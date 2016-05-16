WP REST API - Author Info Plugin
=================

This plugin will get Author's Display Name for each Post in WP REST API.

It takes this:


	author: 1,


And turns it into this:


	author_info: {
		id: 1,
		display_name: "AUTHOR_DISPLAY_NAME"
	},


Credits
=======

[BraadMartin](https://github.com/BraadMartin) for [Better REST API Featured Images](https://github.com/BraadMartin/better-rest-api-featured-images)


License
=======

```license
Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
```