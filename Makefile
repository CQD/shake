.PHONY: deploy server

deploy:
	-gcloud app deploy -v 'dev-master'  --project='solid-course-86810'

server:
	php -S 0.0.0.0:8080 -t public/
