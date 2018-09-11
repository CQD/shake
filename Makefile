.PHONY: deploy server

deploy:
	-gcloud app deploy -v 'dev-master'  --project='solid-course-86810'

server:
	dev_appserver.py app.yaml -A 'my-local-dev' \
		--support_datastore_emulator=true \
		--enable_host_checking false \
		--php_executable_path $$(which php-cgi)
