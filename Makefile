.PHONY: deploy server

deploy:
	-gcloud app deploy -v 'dev-master'  --project='solid-course-86810'

server:
	-dev_appserver.py app.yaml