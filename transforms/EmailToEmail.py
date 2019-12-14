# Maltego Transform to import neighbors based on name
# Inspired by NameFromCSV example
# Reference Guide: https://docs.maltego.com/support/solutions/articles/15000024275-python-trx-library-reference-itds-

from maltego_trx.entities import Email
from maltego_trx.maltego import UIM_PARTIAL
from maltego_trx.transform import DiscoverableTransform

class EmailToEmail(DiscoverableTransform):
    """
    Lookup emails associated with a particular email
    """

    @classmethod
    def create_entities(cls, request, response):
        email_src = request.Value

        try:
            [email_contacts, direction] = cls.get_emails(email_src)
            if email_contacts:
                for email_addr in email_contacts:
                    curr = response.addEntity(Email, email_addr)
                    curr.addProperty('link#maltego.link.direction','link#maltego.link.direction','loose',direction)
            else:
                response.addUIMessage("The email given did not match any email contacts in the CSV file")
        except IOError:
            response.addUIMessage("An error occurred reading the CSV file.", messageType=UIM_PARTIAL)

    @staticmethod
    def get_emails(search_email):
        matching_emails = []
        email_direction = []
        with open("email_to_email.csv") as f:
            for ln in f.readlines():
                email_src, email_dst = ln.split(",", 1)
                if email_src.strip() == search_email.strip():
                    matching_emails.append(email_dst.strip())
                    email_direction.append('input-to-output')
                if email_dst.strip() == search_email.strip():
                    matching_emails.append(email_src.strip())
                    email_direction.append('output-to-input')
        return [matching_emails, email_direction]
